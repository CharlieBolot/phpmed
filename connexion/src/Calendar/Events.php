<?php

namespace Calendar;

class Events{


    private $pdo;


    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     *  permet de récupérer les évenements commencant  entre 2 dates
     * 
     * @param \DateTime $start
     * @param \DateTime $end
     * @param array
     * 
     */

    public function getEventsBetween(\DateTime $start, \DateTime $end) : array {

        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' ORDER BY start ASC";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }


  /**
     *  permet de récupérer les évenements commencant  entre 2 dates indexé par jour
     * 
     * @param \DateTime $start
     * @param \DateTime $end
     * @param array
     * 
     */

    public function getEventsBetweenByDAy(\DateTime $start, \DateTime $end) : array {
    
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event){
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])){
                $days[$date] = [$event];

            }
            else{
                $days[$date][] = $event;
            }
        }
        return $days;   
    
    }

    /**
     * Récupère un évènement
     * @param int $id
     * @return Event
     * @throws \Exception
     * 
     */

    public function find(int $id): Event {
        require_once 'Event.php';
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setfetchMode(\PDO::FETCH_CLASS,Event::class);
        $result = $statement->fetch();
        if ($result === false){
           throw new \Exception('Auncun résultat n\'a été trouvé');
        }
        
        return $result;
    }



    public function hydrate (Event $event, array $data ){
        
        $event->setDescription($data['description']);
        $event->setStart(\DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' '. $data['start'])->format('Y-m-d H:i:s'));
        //$event->setEnd(\DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['end'])->format('Y-m-d H:i:s'));
        $event->setIdpraticien($data['idprat']);
        $event->setIdpat($data['idpat']);
        return $event;
    }


    /**
     * crée un évènement au niveau de la base de données
     * @param Event $event
     * @return bool
     * 
     */

    public function create(Event $event): bool {

        $statement = $this->pdo->prepare('INSERT INTO events ( description, start, end, idpat, idprat) VALUES (?,?,?,?,?) ');
        return $statement->execute([
            
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getIdpat(),
            $event->getIdpraticien()

        ]);
        

    }

    /**
     * Met a jour un évènement au niveau de la base de données
     * @param Event $event
     * @return bool
     * 
     */


    public function update(Event $event): bool {
        $statement = $this->pdo->prepare('UPDATE events SET description = ?, start = ? , end = ? WHERE id = ? ');
        return $statement->execute([
            
            $event->getDescription(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getId()

        ]);

    }

    /**
     * supprime un évènement
     * @param Event $event
     * @return bool
     */


    public function delete(Event $event): bool{
        $statement = $this->pdo->prepare('DELETE FROM events WHERE id = :id ');
        return $statement->execute(['id'=>$event->getId()]);
     

        
    }

}
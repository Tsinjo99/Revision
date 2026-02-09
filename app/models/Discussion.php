<?php
namespace app\models;

use PDO;

class Discussion
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Récupère la conversation entre deux utilisateurs
     */
    public function getConversation(int $me, int $other): array
    {
        $sql = "
            SELECT id, id_me, id_usr2, mess, datetime
            FROM discussion
            WHERE 
                (id_me = :me AND id_usr2 = :other)
                OR
                (id_me = :other AND id_usr2 = :me)
            ORDER BY datetime ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':me' => $me,
            ':other' => $other
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function send(int $me, int $other, string $message): bool
{
    if ($message === '') {
        return false;
    }

    $sql = "
        INSERT INTO discussion (id_me, id_usr2, mess, datetime)
        VALUES (:me, :other, :mess, NOW())
    ";

    $stmt = $this->db->prepare($sql);
    return $stmt->execute([
        ':me' => $me,
        ':other' => $other,
        ':mess' => $message
    ]);
}

    public function markAsRead(int $me, int $other): void
    {
        // Marquer comme lu les messages envoyés par "other" à "me"
        $sql = "UPDATE discussion SET lu = 1 WHERE id_me = :other AND id_usr2 = :me AND lu = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':me' => $me, ':other' => $other]);
    }
}

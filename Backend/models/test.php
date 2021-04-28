<?php


class test extends DatabaseTable implements JsonSerializable
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    public function toArray($mitId = true)
    {
        $attributes = get_object_vars($this);
        if ($mitId === false) {
            unset($attributes['id']);
        }
        return $attributes;
    }

    /**
     * @inheritDoc
     */
    public function save()
    {
        if ($this->getId() != NULL) {
            return $this->_update();
        } else {
            return $this->_insert();
        }
    }

    /**
     * @inheritDoc
     */
    protected function _insert()
    {
        $sql = 'INSERT INTO test (id) VALUE (:id)';
        $query = Database::getDatabase()->prepare($sql);
        $res = $query->execute($this->toArray());
        $this->id = Database::getDatabase()->lastInsertId();
        return $res;
    }

    /**
     * @inheritDoc
     */
    protected function _update()
    {
        $sql = 'UPDATE test SET id=:id WHERE id=:id';
        $res = $query = Database::getDatabase()->prepare($sql);
        $query->execute($this->toArray());
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }



}

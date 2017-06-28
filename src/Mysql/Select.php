<?php

namespace QueryBuilder\Mysql;

class Select
{
    private $table;
    private $fields = [];
    private $filters;

    public function table(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function filter(Filters $filters)
    {
        $this->filters = $filters->getSql();
    }

    public function getSql() :string
    {

        $fields = '*';
        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $filters = '';
        if (!empty($this->filters)) {
            $filters = ' ' . $this->filters;
        }

        $query = 'SELECT %s FROM %s%s;';
        return sprintf($query, $fields, $this->table, $filters);
    }
}
<?php

namespace QueryBuilder\Mysql;

class SelectAndFiltersIntegrationTest extends \PHPUnit\Framework\TestCase
{
    public function testSelectComFiltroWhereEOrder()
    {
        $select = new Select;
        $select->table('users');

        $filters = new Filters;
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'desc');

        $select->filter($filters);

        $actual = $select->getSql();
        $expected = 'SELECT * FROM users WHERE id=1 ORDER BY created desc;';

        $this->assertEquals($expected, $actual);
    }
}
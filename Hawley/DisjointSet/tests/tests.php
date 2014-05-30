<?php
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php');

use Hawley\DisjointSet\DisjointSet;
use Hawley\DisjointSet\DisjointSetMember;

class TestOfDisjointSetMember extends UnitTestCase {
    public function testMember() {
        $djsm = new DisjointSetMember(1);
        $this->assertEqual($djsm->getKey(), 1);
        $this->assertEqual($djsm->getParent(), 1);
        $this->assertEqual($djsm->getRank(), 0);
        $djsm->increaseRank();
        $this->assertEqual($djsm->getRank(), 1);
        $djsm->setParent(2);
        $this->assertEqual($djsm->getParent(), 2);
    }
}

class TestOfDisjointSet extends UnitTestCase {
    public function testSet() {
        $set = new DisjointSet();
        $one = new DisjointSetMember(1);
        $set->add($one);
        $set->add(new DisjointSetMember(2));
        $set->add(new DisjointSetMember(3));
        $set->add(new DisjointSetMember(4));
        $set->add(new DisjointSetMember(5));
        $set->add(new DisjointSetMember(6));
        $set->add(new DisjointSetMember(7));
        $set->union(1, 2);
        $this->assertEqual($set->find(2), 1);
        $this->assertEqual($set->find(1), 1);
        $this->assertEqual($one->getRank(), 1);
        $set->union(3, 1);
        $this->assertEqual($set->find(3), 1);
        $this->assertEqual($set->find(1), 1);
        $set->union(4, 5);
        $set->union(1, 4);
        $this->assertEqual($set->find(4), 1);
        $this->assertEqual($set->find(5), 1);
        $this->assertEqual($set->find(1), 1);
        $this->assertEqual($one->getRank(), 2);
        $set->union(6, 7);
        $set->union(5, 7);
        $this->assertEqual($set->find(6), 1);
        $this->assertEqual($set->find(7), 1);
        $this->assertEqual($set->find(7), 1); //assert path compression
        $this->assertEqual($set->find(1), 1);
        $this->assertEqual($one->getRank(), 2);
    }
}
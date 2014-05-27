<?php

namespace Hawley\DisjointSet;

interface IDisjointSet {
    public function add(IDisjointSetMember $member);
    public function find($key);
    public function union($key1, $key2);
}
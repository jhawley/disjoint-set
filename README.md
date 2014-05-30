# Purpose
To provide disjoint set data structures with various performance characteristics

# Example
    $set = new DisjointSet();
    $set->add(new DisjointSetMember(1));
    $set->add(new DisjointSetMember(2));
    $set->add(new DisjointSetMember(3));
    $set->add(new DisjointSetMember(4));
    $set->add(new DisjointSetMember(5));
    $set->add(new DisjointSetMember(6));
    $set->add(new DisjointSetMember(7));
    $set->union(1, 2);
    $this->assertEqual($set->find(2), 1);
    $this->assertEqual($set->find(1), 1);
    $set->union(3, 1);
    $this->assertEqual($set->find(3), 1);
    $this->assertEqual($set->find(1), 1);
    $set->union(4, 5);
    $set->union(1, 4);
    $this->assertEqual($set->find(4), 1);
    $this->assertEqual($set->find(5), 1);
    $this->assertEqual($set->find(1), 1);
    $set->union(6, 7);
    $set->union(1, 7);
    $this->assertEqual($set->find(6), 1);
    $this->assertEqual($set->find(7), 1);
    $this->assertEqual($set->find(1), 1);

# Installation
Requires PHP 5.3.0 (for namespaces).

# License
Public domain without warranties
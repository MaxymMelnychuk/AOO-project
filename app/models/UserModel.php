<?php
class UserModel extends Bdd
{

 public function __construct()
 {
  parent::__construct();
 }

 public function findAll(): array
 {
  $users = $this->co->prepare('SELECT * FROM Users');
  $users->execute();

  return $users->fetchAll(PDO::FETCH_CLASS, 'User');
 }

 public function findOneById(int $id): User | false
 {
  $users = $this->co->prepare('SELECT * FROM Users WHERE id = :id LIMIT 1');
  $users->setFetchMode(PDO::FETCH_CLASS, 'User');
  $users->execute([
   'id' => $id
  ]);

  return $users->fetch();
 }
}

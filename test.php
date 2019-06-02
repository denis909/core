<?php

$files = scandir(__DIR__ . '/src');

require_once __DIR__ . '/src/Exception.php';
require_once __DIR__ . '/src/IsInstanceOfTrait.php';

foreach($files as $file)
{
    if (($file == 'composer.json') || ($file == '.') || ($file == '..') || ($file == 'test.php'))
    {
        continue;
    }

    require_once __DIR__ . '/src/' . $file;
}

$config = new denis909\core\DbConfig('localhost', 'root', '', 'denis909_core');

$adapter = new denis909\core\DbMySQLiAdapter($config);

$db = new denis909\core\Db($adapter);

$params = ['name' => 'Имя ` "ту\'т'];

$sql = $db->createCommand()->insert('test', $params) . "\n";

$id = $db->insert('test', $params);

echo $id . "\n";

$db->update('test', ['name' => 'updated 1'], ['id' => $id]);

$db->update('test', ['name' => 'updated 2'], 'id=:id', [':id' => $id]);

$sql = $db->createCommand()->findAll('test', ['id' => $id]) . "\n";

$all = $db->findAll(['test' => ['id']], ['id' => $id]);

$row = $db->findOne('test', ['id' => $id]);

echo 'Object ID: ' . $row->id . "\n";
echo 'Array ID: ' . $row['id'] . "\n";

$row = $db->findOne('test', 'id=:id', [':id' => $id]);

$db->delete('test', 'id=:id', [':id' => $id]);

$row = $db->findOne('test', 'id=:id', [':id' => $id]);

if ($row)
{
    throw new Exception('not deleted.');
}

$view = new denis909\core\View;

echo $view->renderFile(__DIR__ . '/README.md');

# phpORM
Simple PHP Object Relational Mapping (ORM) Library

Basic usage:

    require_once('lib/rows.php');

Selecting entire table:

    $myObj = getRows('myTable');
    if(is_array($myObj)) {
      foreach($myObj as $obj) {
        print $obj->id;
        print $obj->name;
      }
    } else {
      print $myObj->id;
      print $myObj->name;
    }

Selecting specific rows:

    $myObj = getRows('myTable', 'id = 1');
    print $myObj->id;
    print $myObj->name;

Saving object to database:

    $myObj = getRows('myTable', 'id = 1');
    $myObj->name = 'new name';
    $myObj->save();

Create new object:

    $myObj = new Row('myTable');
    $myObj->name = 'some name';
    $myObj->save();

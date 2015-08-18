## Hyperion [![Latest Stable Version](https://poser.pugx.org/saturn/hyperion/v/stable)](https://packagist.org/packages/saturn/hyperion) [![License](https://poser.pugx.org/saturn/hyperion/license)](https://packagist.org/packages/saturn/hyperion)
Hyperion is the lightweight MVC framework that puts the **FUN** back in **progrFUNamming!** Or, you know, *whatever*. Hyperion makes it super-easy to create MVC applications.

**BONUS FEATURE:** No sibling incest (which can't be said about the greek deity that stole our name).
### Requirements
* PHP >= 5.3.
* Apache web server, with support for mod_rewrite.
* MySQL database (optional).

### Installation
Add a .htaccess file to your root directory and create your rewrite rules. The requests should be redirected to the file index.php inside the ``public`` directory, for example:
```htaccess
Options -Indexes
RewriteEngine on
RewriteBase /public
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_METHOD} ^(get|post)$ [NC]
RewriteRule ^ index.php [QSA,L]
```
#### Using Composer (recommended)
Hyperion is designed as a Composer library package. So the by far easiest, but maybe not cleanest, way to install Hyperion is by using Composer. This will add the framework to the ``vendor`` directory, which will hide away the not-so-ugly but boring-shitty core files and help you focus on creating your **SUPER HAPPY AWESOME FUN** (henceforth, **SHAF**) application without any incestuous gods being all up in your file-structure-business. Just run the following command in the root directory of your project.
```bash
$ composer require saturn/hyperion
```
#### Source code
Of course, you can also download the source files or clone the git repository and manually add it to folder of your choice. It is recommended that you put in a separate folder at the root level, for example ``hyperion``.
```bash
$ git clone git://github.com/pkrll/Hyperion.git
```
### Setup
* Hyperion depends on the below outlined folder structure. So recreate this structure:
```
- application/
   - controllers/
     + Custom controllers goes here (ie ExampleController.php).
   - includes/
     + The UI includes resides here, with its own folder structure (ie Example/main.inc)
   - models/
     + Custom models goes here (ie ExampleModel.php).
   - templates/
     + The UI templates resides here, with its own folder structure (ie Example/main.tpl).
   - views/
     + Custom views goes here (ie ExampleView.php).
- public/
   - css/ (optional)
      + Stylesheet files.
   - images/ (optional)
      + System images and uploads.
   - javscript/ (optional)
      + JavaScript files.
   - index.php
- .htaccess
```
* If you want to use a database in your project, set the database specific constants in the file ``config.php`` in the Hyperion folder to values appropriate to your configuration.
* Next, you need to include the files. Depending on the installation method, this step will differ.

#### Using Composer
* If installed with Composer, the folder ``vendor`` should have been added to the root directory. The framework is inside that folder. Use Composer's autoload method to import the files, by adding the following to the top of your index.php in the folder ``public``:
```php
use hyperion\core\Bootstrap;
include dirname(__DIR__)."/vendor/autoload.php";
```
#### Manual installation
* If installed manually, you need to include the Hyperion files (except for config.php). Below follows an example:
```php
// index.php
use hyperion\core\Bootstrap;
include dirname(__DIR__)."/hyperion/core/Bootstrap.php";
include dirname(__DIR__)."/hyperion/core/Controller.php";
include dirname(__DIR__)."/hyperion/core/Model.php";
include dirname(__DIR__)."/hyperion/core/View.php";
include dirname(__DIR__)."/hyperion/library/Database.php";
```
#### Bootstrapping
* Before you can start using Hyperion to create your **WORLD SHATTERING SHAF** (**WSSHAF** for short (see above for definition of **SHAF**)) application, you need to call the Bootstrap class. Add the following code at the end of ``index.php``.
```php
$App = new Bootstrap();
```
### Usage
All controllers must be placed inside the folder ``application/controllers``. The controllers must also abide to a specific naming convention, where the file and class name must start with a capital letter and end with Controller. Let's say we want to create a controller called **SHAF**. The file would then be called ``SHAFController.php``, while class is named ``SHAFController``. The controller classes must also extend the base controller, ``Controller``.

* Note: All controllers must have the default main-method, which will be called if the URL request does not specify any action (i.e. *hyperion.dev/example*). Method foo() is an example of when the URL request path is set and a parameter is passed along (i.e. *hyperion.dev/example/foo/bar*).

##### ExampleController.php
```php
use hyperion\core\Controller;

class ExampleController extends Controller {
    public function main () {
       // Let's get a message from our overlords
       // in the Model class.
       $message = $this->model()->getMessageFromOverlords();
       // Assign the variable to the view
       // class to send to the template:
       $this->view()->assign("message", $message);
       // Render the template file (inside
       // the application/templates folder):
       $this->view()->render("Example/main.tpl");
    }
    // hyperion.dev/example/foo/bar
    public function foo() {
       // set $argument to the parameter ("bar")
       $argument = $this->arguments[0];
       // Use $this->arguments[n] if there are more parameters
       ...
    }
}
```
Models follow the same naming convention as do Controllers and View classes.
##### ExampleModel.php
```php
use hyperion\core\Model;

class ExampleModel extends Model {
    public function getMessageFromOverlords() {
       // This is where the app logic goes
       // ...
       $response = "This is SHAF app!";
       return $response;
    }
}
```
##### example/main.tpl
```html
<html>
   <head><title>A SHAF app example</title></head>
   <body>
       <?=$message?>
       <!-- prints out: This is a SHAF app! -->
   </body>
</html>
```
#### Database support
Want to use a database? You got it. Wouldn't be SHAF apping otherwise. Hyperion comes with a simple Database class (using PDO), which supports MySQL. To make it super-easy and **EXTREMELY WSSHAF** (let's call it **EWSSHAF**) for you, the base model, that all your model classes extend, comes with a bunch of method for accessing simple and basic PDO commands. Below follows a list of methods you can use when creating your **EWSSHAF** app.
```php
// Model.php
/**
 * Prepare an SQL statement for execution.
 * @param   string  The SQL statement to prepare.
 */
final protected function prepare($query);

/**
 * Bind a value to a named or question mark placeholder
 * in the prepared SQL statement.
 * @param   mixed   The parameter identifier. For named
 *                  placeholder, this value must be a
 *                  string (:name). For a question mark
 *                  placeholder, the value must be the
 *                  1-indexed position of the parameter.
 * @param   mixed   The value to bind to the parameter.
 * @param   int     Data type for the parameter, using
 *                  the predefined PDO constants:
 *                  http://php.net/manual/en/pdo.constants.php
 * @return  bool
 */
final protected function bindValue($param, $value, $dataType = PDO::PARAM_STR);

/**
 * Bind a referenced variable to a named or question mark
 * placeholder in the prepared SQL statement.
 * @param   mixed   The parameter identifier. For named
 *                  placeholder, this value must be a
 *                  string (:name). For a question mark
 *                  placeholder, the value must be the
 *                  1-indexed position of the parameter.
 * @param   mixed   Variable to bind to the parameter.
 * @param   int     Data type for the parameter, using
 *                  the predefined PDO constants:
 *                  http://php.net/manual/en/pdo.constants.php
 * @return  bool
 */
final protected function bindParam($param, &$value, $dataType = PDO::PARAM_STR);

/**
 * Run the supplied query. Only for fetching rows from
 * the database.
 * @param   string  Optional. The SQL query to execute.
 * @param   array   Optional. Additional parameters to
 *                  supply to the query.
 * @param   bool    If true, fetches all matching rows.
 *                  Defaults to TRUE.
 * @return  mixed   A list of matching rows or on error
 *                  an array with the error message.
 **/
final protected function read($query = NULL, $params = NULL, $fetchAll = TRUE);

/**
 * Run the supplied query. Only for adding rows to the
 * the database.
 * @param   string  Optional. The SQL query to execute.
 * @param   array   Optional. Additional parameters to
 *                  supply to the query.
 * @return  mixed   On success: the last inserted id or.
 *                  On error: An array with the error.
 **/
final protected function write($query = NULL, $params = NULL);

/**
 * Return the number of rows affected by the last SQL
 * statement performed.
 * @return  int
 */
final protected function rowCount();
```
Confused? Me too. But hey, let's see an example on how to use this to make **CUTE EWSSHAF** (Yup, you guessed it, **CEWSSHAF**! Okay, I need to stop...) applications.
```php
// ExampleModel.php
use hyperion\core\Model;

class ExampleModel extends Model {
    public function getMessageFromOverlords() {
        // Prepare the query
        $this->prepare("SELECT Message FROM OverlordMessageBoard");

        // Call the read() method from the parent class Model.
        $response = $this->read();

        // The above can also be written:
        // $response = $this->read("SELECT Message FROM OverlordMessageBoard");

        return $response;
    }
}
```
What is a **DELICIOUS CEWSSHAF** (Oh you know it, **DCEWSSHAF**. Seriously, I can't stop, I have serious mental issues, help me...) application without statements with -- PARAMETERS?!
```php
// ExampleModel.php
use hyperion\core\Model;

class ExampleModel extends Model {

    public function addMessage($message) {
        // The $message array would look like this:
        // array(
        //    "message" => "DCEWSSHAF apping!!",
        //    "date" => time()
        // );

        $sqlQuery = "INSERT INTO Messages (message, date) VALUES(:message, :date)";
        $this->prepare($sqlQuery);

        $this->bindValue(":message", $message['message']);
        $this->bindValue(":date", $message['date']);

        $response = $this->write();

        return $response;
    }

    public function deleteMessage($id) {
        $sqlQuery = "DELETE FROM Messages WHERE id = :id";
        $sqlParam = array("id"  => $id);
        // We did not use prepare() – do not worry,
        // the write/read methods will prepare the
        // statement for your if supplied directly.
        $response = $this->write($sqlQuery, $sqlParam);
        return $response;
    }

    // Lets do a more complicated example
    public function addMessages(array $messages) {
        // The $messages array looks like this:
        // $messages[] = array(
        //     "message"   => "Message 1",
        //     "date"      => time()
        // );
        // $messages[] = array(
        //     "message"   => "Message 2",
        //     "date"      => time()
        // );
        // $messages[] = array(
        //     "message"   => "Message 3",
        //     "date"      => time()
        // );

        // Create the question marked placeholders, based on
        // the number of values the row will take, (?,?...).
        $markers = array_fill(0, count($messages[0]), '?');
        $markers = '(' . implode(", ", $markers) . ')';

        // The number of placeholders must match the number
        // of values that are to be inserted in the VALUES-
        // clause. Create the array with array_fill() and
        // join the array with the query-string.
        $sqlClause = array_fill(0, count($messages), $markers);
        $sqlQuery = "INSERT INTO Messages (message, date) VALUES " . implode(", ", $sqlClause);

        $this->prepare($sqlQuery);

        // Bind the values using bindValue().
        // Using question marked placeholders,
        // the value must be 1-indexed, that
        // is starting at position 1.
        $index = 1;
        foreach ($messages AS $key => $message) {
            $this->bindValue($index++, $message['message']);
            $this->bindValue($index++, $message['date']);
        }

        // A more pretty and dynamic way to write
        // the above statement could be by going
        // by the columns of the array, like so:
        // $columns = array_keys($messages[0]);
        //foreach ($messages AS $key => $message) {
            // foreach ($columns AS $column)
            //     $this->bindValue($position++, $messages[$column]);

        // Write to database
        $response = $this->write();
        return $response;
    }
}
```
### Author
* Hyperion was birthed by Ardalan Samimi.

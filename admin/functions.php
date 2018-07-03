<?php


function confirm($result) {
    
        global $connection;
    
        if(!$result) {
            
            die("QUERY FAILED: " .mysqli_error($connection));
            
        }
        
}


function insert_categories() {
    
                            //Make Connection to DB global var.
                            global $connection;
                            
                            
                                //if submit button is hit and string is not empty then the data is inserted into database. 
                            
                            if (isset($_POST['submit'])) {
                                
                                    $cat_title = $_POST['cat_title'];
                                    
                                    if($cat_title == "" || empty($cat_title)) {
                                        
                                        echo "This field should not be left empty";
                                        
                                    } else {
                                        
                                        $query = "INSERT INTO categories(cat_title) ";
                                        $query .= "VALUES('{$cat_title}') ";
                                        
                                        $create_category_query = mysqli_query($connection, $query);
                                        
                                        if(!$create_category_query) {
                                            
                                            die('QUERY FAILED' .mysqli_error($connection));
                                            
                                        }
                                        
                                    }
                                
                            }
                            
    
}


function findAllCategories() {
    
            global $connection;
            
            //create an SQL Query using mysqli_query function, assign it to a variable
                                $query = "SELECT * FROM categories"; //LIMIT *insert number here* to limit number of categories shown.
                                $select_categories = mysqli_query($connection, $query);
                                
                                
                                //while there is a row to display, set that as an anchored <li>
                                while($row = mysqli_fetch_assoc($select_categories)) {
                                    
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                
                                }
    
    
}


function deleteCategories() {
    
        global $connection;
        
            //Check to see if delete option is set, if it is complete query to remove entry from DB
                                if (isset($_GET['delete'])) {
                                    
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                        $delete_query = mysqli_query($connection, $query);
                                        //Send data as another request and refresh page
                                        header("Location: categories.php");
                                        
                                }
    
    
}





?>
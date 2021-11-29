<?php
class Admin extends Controller
{
    public function Show(){
        if($this->CheckIsLogin())
        {
            $this->view("AdminLayout", []);
        }
        else
        {
            $this->Login();
        }
        
    }

    public function Login()
    {
        $this->view("AdminLayout", [
            "page" => "Login"
        ]);
    }

    public function CheckIsLogin()
    {
        return isset($_SESSION['admin_id']) && isset($_SESSION['admin_username']);
    }

    public function Logout()
    {
        //Destroy the session
        session_destroy(); //Unset $_SESSION['user]
        //Redirect to login page
        header('Location:Login');
    }

    public function Authenticate()
    {
        //get all book atrributes from $_POST[]
        $account = array("username", "password");
        $accountValues = array();
        foreach($account as $attribute) {
            $accountValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
        }
        //all attributes of book is saved in $book
        $account = array_combine($account, $accountValues);
        print_r($account);
        //call model and update
        $adminModel = $this->model("AdminModel");
        $res = $adminModel->getAdminByAccount($account);
        //print_r($res);
        $checkAdmin = mysqli_num_rows($res);
        if($checkAdmin==1)
        {
            $admin = mysqli_fetch_assoc($res);
            $_SESSION['admin_login'] = "<div class='text-successs'>LOGIN SUCCESSFULLY!</div>";
            $_SESSION['admin_id'] = $admin['ID'];
            $_SESSION['admin_username'] = $admin['USERNAME'];

            // $url = 'Show';
            // header("Refresh:0; url=$url");
            header('Location:Show');
        }
        else
        {
            $_SESSION['admin_login'] = "<div class='text-danger'>LOGIN FAILED!</div>";
            header('Location:Login');
        }
    }

    public function Account()
    {
        if($this->CheckIsLogin())
        {
            $admin_id = $_SESSION['admin_id'];
            $adminModel = $this->model("adminModel");
            $resAdmin = $adminModel->getAdminById($admin_id);
            $admin = mysqli_fetch_assoc($resAdmin);
            $this->view("AdminLayout", [
                "page" => "Account",
                "admin" => $admin
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function Customer()
    {
        if($this->CheckIsLogin())
        {
            $customer = $this->model("CustomerModel");
            $customers = $customer->getAllCustomers();
            $this->view("AdminLayout", [
                "customers" => $customers,
                "page" => "Customer"
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateCustomer($id)
    {
        if($this->CheckIsLogin())
        {
            $customer = $this->model("CustomerModel");
            $customer = $customer->getCustomerById($id);
            $this->view("AdminLayout", [
                "customer" => $customer
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function Book()
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("BookModel");
            $books = $model->getAllBooks();
            //get all author names of this books
            $author_names = [];
            while($row=mysqli_fetch_assoc($books))
            {
                $author_id = $row['AUTHOR_ID'];
                $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
                $author_name = $author['ANAME'];
                array_push($author_names, $author_name);
            }
            $this->view("AdminLayout", [
                "page" => "Book",
                "books" => $model->getAllBooks(),
                "author_names" => $author_names
            ]);
        }
        else
        {
            $this->Login();
        }
        
    }

    public function BookDetail($isbn)
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("BookModel");
            $book = $model->getBookByIsbn($isbn);

            $author_name = "NoName";
            $row=mysqli_fetch_assoc($book);
            $author_id = $row['AUTHOR_ID'];
            $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
            $author_name = $author['ANAME'];

            $this->view("AdminLayout", [
                "page" => "BookDetail",
                "book" => $model->getBookByIsbn($isbn),
                "author_name" => $author_name
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateBook($isbn)
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("BookModel");
            $book = $model->getBookByIsbn($isbn);
            //Get author name of this book
            $author_name = "NoName";
            $row=mysqli_fetch_assoc($book);
            $author_id = $row['AUTHOR_ID'];
            $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
            $author_name = $author['ANAME'];
            //Get all authors and publishers for selection in updating form
            $authors = $model->getAllAuthors();
            $this->view("AdminLayout", [
                "page" => "UpdateBook",
                "book" => $model->getBookByIsbn($isbn),
                "author_name" => $author_name,
                "authors" => $authors
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateBookToDB($isbn)
    {   
        if($this->CheckIsLogin())
        {
            //get all book atrributes from $_POST[]
            $book = array( "title",
                        "author_id",          
                        "publisher",          
                        "description",
                        "image",               
                        "price");
            $bookValues = array();
            foreach($book as $attribute) {
                $bookValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $book
            $book = array_combine($book, $bookValues);
            //call model and update
            $model = $this->model("BookModel");
            $res = $model->updateBookByIsbn($isbn, $book);
            if($res){
                //$_SESSION['update'] = "UPDATED SUCCESSFULLY!";
                $url = 'UpdateBook?isbn='.$isbn;
                header("Refresh:0; url=$url");
            }
        }
        else
        {
            $this->Login();
        }
        
    }

    public function DeleteBook($isbn)
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("BookModel");
            $res = $model->deleteBookByIsbn($isbn);
            if($res){
                //$_SESSION['delete'] = "DELETED BOOK SUCCESSFULLY!";
                $url = 'Book';
                header("Refresh:0; url=$url");
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function AddBook()
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("BookModel");

            //Get all authors and publishers for selection in updating form
            $authors = $model->getAllAuthors();
            $publishers = $model->getAllPublishers();

            $this->view("AdminLayout", [
                "page" => "AddBook",
                "authors" => $authors,
                "publishers" => $publishers
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function AddBookToDB()
    {
        if($this->CheckIsLogin())
        {
            //get all book atrributes from $_POST[]
            $book = array(  "isbn",
                            "title",
                            "author_id",          
                            "publisher",          
                            "description",
                            "image",               
                            "price");
            $bookValues = array();
            foreach($book as $attribute) {
                $bookValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $book
            $book = array_combine($book, $bookValues);
            print_r($book);

            //call model and update
            $model = $this->model("BookModel");
            $res = $model->addBook($book);

            if($res){
                //$_SESSION['add'] = "ADDED BOOK SUCCESSFULLY!";
                $url = 'Book';
                header("Refresh:0; url=$url");
            }
            else
            {
                print_r($res);
                echo "QUERY ERROR!";
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateAdminInfo()
    {
        if($this->CheckIsLogin())
        {
            $adminID = $_SESSION['admin_id'];
            $adminInfo = array("id", "fname", "lname", "email", "phone");
            $adminInfoValues = array();
            foreach($adminInfo as $attribute) {
                $adminInfoValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $adminInfo
            $adminInfo = array_combine($adminInfo, $adminInfoValues);
            $adminInfo["id"] = $adminID;
            //print_r($adminInfo);
            $adminModel = $this->model("AdminModel");
            $resUpdateAdminInfo = $adminModel->updateAdminInfoByID($adminInfo);
            if($resUpdateAdminInfo)
            {
                $_SESSION['update_admin_info'] = "UPDATED ADMIN INFORMATION SUCCESSFULLY!";
            }
            else
            {
                $_SESSION['update_admin_info'] = "FAILED TO UPDATE ADMIN INFORMATION!";
            }
        }
            else
        {
            $this->Login();
        }
    }

    public function UpdateAdminAccount()
    {
        if($this->CheckIsLogin())
        {
            $adminID = $_SESSION['admin_id'];
            $adminAccount = array("id", "password");
            $adminAccountValues = array();
            foreach($adminAccount as $attribute) {
                $adminAccountValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $adminAccount
            $adminAccount = array_combine($adminAccount, $adminAccountValues);
            $adminAccount["id"] = $adminID;
            //print_r($adminAccount);

            $resUpdateAdminAccount = $admintomerModel->updateAdminAccountByID($adminAccount);
            if($resUpdateAdminAccount)
            {
                $_SESSION['update_admin_account'] = "UPDATED ADMIN ACCOUNT SUCCESSFULLY!";
                return True;
            }
            else
            {
                $_SESSION['update_admin_account'] = "FAILED TO UPDATE ADMIN ACCOUNT!";
                return False;
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function CustomerDetail($id)
    {
        if($this->CheckIsLogin())
        {
            $customerModel = $this->model("CustomerModel");
            $resCustomer = $customerModel->getCustomeById($id);
            $customer = mysqli_fetch_assoc($resCustomer);
            $this->view("AdminLayout", [
                "page" => "CustomerDetail",
                "customer" => $customer
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function DeleteCustomer($id)
    {
        if($this->CheckIsLogin())
        {
            $model = $this->model("CustomerModel");
            $res = $model->deleteCustomerByID($id);
            if($res){
                //$_SESSION['delete'] = "DELETED BOOK SUCCESSFULLY!";
                header('Location:Customer');
            }
        }
        else
        {
            $this->Login();
        }
    }
    

}

?>
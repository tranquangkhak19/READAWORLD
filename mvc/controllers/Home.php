<?php
class Home extends Controller
{
    public function Show()
    {
        $model = $this->model("BookModel");
        $books = $model->getAllBooks();
        $authors = $model->getAllAuthors();

        $this->view("GuestLayout", [
            "page" => "HomePage",
            "books" => $books,
            "authors" => $authors
        ]);
    }
}

?>
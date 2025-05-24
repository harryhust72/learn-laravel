import $ from "@js/jquery";

function BookService() {
    return {
        getBook(bookId) {
            return $.ajax({
                url: `/books/${bookId}`,
                method: "GET",
            });
        },

        editBook(bookId, newData) {
            return $.ajax({
                url: `/books/${bookId}`,
                method: "PATCH",
                data: newData,
            });
        },

        deleteBook(bookId) {
            return $.ajax({
                url: `/books/${bookId}`,
                method: "DELETE",
            });
        },

        createBook(data) {
            return $.ajax({
                url: "/books",
                method: "POST",
                data,
            });
        },
    };
}

const { getBook, createBook, editBook, deleteBook } = BookService();
export default { getBook, createBook, editBook, deleteBook };

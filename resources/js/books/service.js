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
                method: "POST",
                data: newData,
                processData: false, // Prevent jQuery from automatically transforming the FormData object
                contentType: false, // Prevent jQuery from setting the Content-Type header
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
                processData: false, // Prevent jQuery from automatically transforming the FormData object
                contentType: false, // Prevent jQuery from setting the Content-Type header
            });
        },
    };
}

const { getBook, createBook, editBook, deleteBook } = BookService();
export default { getBook, createBook, editBook, deleteBook };

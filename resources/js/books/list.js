import $ from "@js/jquery";
import bookApi from "@js/books/service";
import AppModal from "@js/components/modal";
import { executeService, priceToVnd } from "@js/common";

const bookFields = ["title", "price", "description"];
const bookFieldsIncludeImage = [...bookFields, "image"]

function BookManager() {
    const createBookForm = $("#create-book-form");
    const editBookForm = $("#edit-book-form");
    const createBookModal = new AppModal("create-book-modal", {
        closeCallback: closeCreateBookModal,
        submitCallback: createBook,
    });
    const editBookModal = new AppModal("edit-book-modal", {
        closeCallback: closeEditBookModal,
        submitCallback: editBook,
    });
    const createBookButton = $("#create-book-button");
    let currentBookId = null;

    function openCreateBookModal() {
        createBookModal.show();
    }

    function closeCreateBookModal() {
        createBookForm[0].reset();
        clearFormErrors();
    }

    async function openEditBookModal(bookId) {
        currentBookId = bookId;
        editBookForm[0].reset();
        const book = await bookApi.getBook(bookId);
        for (const field of bookFields) {
            editBookForm.find(`input[name="${field}"]`).val(book[field]);
        }
        editBookModal.show();
    }

    function closeEditBookModal() {
        editBookForm[0].reset();
        clearFormErrors();
    }

    function clearFormErrors() {
        for (const field of bookFieldsIncludeImage) {
            $(`.error-${field}`).text("");
        }
    }

    async function createBook() {
        const result = await executeService(
            bookApi.createBook,
            new FormData(createBookForm[0])
        );

        if (result?.status === "error") {
            if(result.type === "validation"){
                for (const field of bookFieldsIncludeImage) {
                    $(`.error-${field}`).text(result.errors?.[field]?.[0] || "");
                }
            }
            return;
        }

        const bookLists = $("#books__list");
        const bookItem = document.createElement("div");
        bookItem.id = `book-${result.id}`;
        bookItem.classList.add("books-item");

        const image = document.createElement("img");
        image.src = result.image_url || "/storage/no_image.avif";
        image.alt = result.title;
        image.classList.add("books-item__image");

        const bookContent = document.createElement("div");
        bookContent.classList.add("books-item__content");

        const title = document.createElement("h2");
        title.innerText = result.title;
        title.classList.add("books-item__content__title");

        const price = document.createElement("p");
        price.classList.add("books-item__content__price");
        const priceValue = document.createElement("span");
        priceValue.classList.add("books-item__content__price__value");
        priceValue.innerText = priceToVnd(result.price);
        price.appendChild(priceValue);

        const description = document.createElement("p");
        description.classList.add("books-item__content__description");
        const descriptionValue = document.createElement("span");
        descriptionValue.classList.add(
            "books-item__content__description__value"
        );
        descriptionValue.innerText = result.description;
        description.appendChild(descriptionValue);

        const actions = document.createElement("div");
        actions.classList.add("books-item__content__actions");

        const editButton = document.createElement("button");
        editButton.classList.add(
            "app-button",
            "books-item__content__actions--edit",
            "app-button--warning"
        );
        editButton.id = `edit-${result.id}`;
        editButton.innerText = "Edit";
        editButton.onclick = () => openEditBookModal(result.id);

        const deleteButton = document.createElement("button");
        deleteButton.classList.add(
            "app-button",
            "books-item__content__actions--delete",
            "app-button--danger"
        );
        deleteButton.id = `delete-${result.id}`;
        deleteButton.innerText = "Delete";
        deleteButton.onclick = () => deleteBook(result.id);

        actions.appendChild(editButton);
        actions.appendChild(deleteButton);
        bookContent.appendChild(title);
        bookContent.appendChild(description);
        bookContent.appendChild(price);
        bookContent.appendChild(actions);
        bookItem.appendChild(image);
        bookItem.appendChild(bookContent);
        bookLists.append(bookItem);
        closeCreateBookModal();
        createBookModal.hide();
    }

    async function editBook() {
        const formData = new FormData(editBookForm[0]);
        formData.append("_method", "PATCH");
        const result = await executeService(
            bookApi.editBook,
            currentBookId,
            formData
        );

        if (result?.status === "error" && result.type === "validation") {
            for (const field of bookFieldsIncludeImage) {
                $(`.error-${field}`).text(result.errors?.[field]?.[0] || "");
            }
            return;
        }

        const bookElement = $(`#book-${result.id}`);
        bookElement.find(".books-item__content__title").text(result.title);
        bookElement.find(".books-item__image").attr("src", result.image_url || "/storage/no_image.avif");
        bookElement
            .find(".books-item__content__description")
            .text(result.description);
        bookElement
            .find(".books-item__content__price")
            .text(priceToVnd(result.price));
        closeEditBookModal();
        editBookModal.hide();
    }

    async function deleteBook(bookId) {
        await executeService(bookApi.deleteBook, bookId);
        $(`#book-${bookId}`).remove();
    }

    $(".books-item__content__actions--edit").on("click", async function () {
        const bookId = $(this).attr("id").split("-").pop();
        openEditBookModal(bookId);
    });

    $(".books-item__content__actions--delete").on("click", async function () {
        const bookId = $(this).attr("id").split("-").pop();
        deleteBook(bookId);
    });

    createBookButton.on("click", (e) => {
        e.stopPropagation();
        openCreateBookModal();
    });
}

BookManager();

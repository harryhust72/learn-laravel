import $ from "@js/jquery";

export default class AppModal {
    constructor(modalId, { submitCallback, closeCallback } = {}) {
        this.modal = $(`#${modalId}`);
        this.closeModalButton = $(`#close-modal-button-${modalId}`);
        this.modalSubmitButton = $(`#modal-submit-button-${modalId}`);
        this.submitCallback = submitCallback;
        this.closeCallback = closeCallback;
        this.init();
    }

    show() {
        this.modal.show();
    }

    hide() {
        this.modal.hide();
        this.closeCallback?.();
    }

    init() {
        this.closeModalButton.on("click", (e) => {
            e.stopPropagation();
            this.hide();
        });

        this.modalSubmitButton.on("click", (e) => {
            e.preventDefault();
            this.submitCallback?.();
        });
    }
}

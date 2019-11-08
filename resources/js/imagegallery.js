export default class ImageGallery {
    constructor(data) {
        for (let field in data) {
            this[field] = data[field];
        }
        this.percent = 0;
    }

    getProgress() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", (evt) => {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                this.percent = percentComplete * 100;
            }
        }, false);

        return xhr;
    }

    getPercentSucess() {
        return this.percent;
    }

    triggerDone(data) {
        for (let field in data) {
            this[field] = data[field];
        }
        alert('done');
    }
}
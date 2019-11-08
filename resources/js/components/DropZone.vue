<template>
    <form action="/upload" enctype="multipart/form-data" v-on:drop.prevent="handleDropFile"
        v-on:dragover.prevent="handleDragOver" v-on:dragenter.prevent="handleDragEnter"
        v-on:dragleave="handleDragLeave">
        <div :class="{ dragover : dragOver }" class="dropzone text-center " @click="chooseFile">
            <h3>Drop files here or click to choose file</h3>
        </div>
        <input type="file" class="hiddenfile" id="file-upload" ref="files" @change="uploadedFile" multiple>
    </form>
</template>

<script>
    import ImageGallery from '../imagegallery.js';
    export default {
        props: ['imageslist'],
        data: () => {
            return {
                files: [],
                dragOver: false
            };
        },
        methods: {
            chooseFile(e) {
                this.$refs.files.click();
            },
            handleDropFile(e) {
                this.dragOver = false;
                let droppedFiles = e.dataTransfer.files;
                if (!droppedFiles) return;
                ([...droppedFiles]).forEach((f) => {
                    this.files.push(f);
                });
                this.uploadFile();
            },
            handleDragOver(e) {
                this.dragOver = true;
            },
            handleDragEnter(e) {
                this.dragOver = true;
            },
            handleDragLeave(e) {
                this.dragOver = false;
            },
            uploadedFile(e) {
                let uploadedFiles = this.$refs.files.files;
                if (!uploadedFiles) return;
                ([...uploadedFiles]).forEach((file) => {
                    this.files.push(file);
                });
                this.uploadFile();
            },
            uploadFile() {
                let formData = new FormData();
                this.files.forEach((file, index) => {
                    formData.append('file', file);
                    let tempImageObj = new ImageGallery();
                    this.imageslist.push(tempImageObj);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        xhr: tempImageObj.getProgress,
                        url: '/gallery/upload',
                        method: "POST",
                        data: formData,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        cache: false,
                        enctype: 'multipart/form-data',
                        success: (res) => {
                            if (res.status) {
                                tempImageObj.triggerDone(res.newImage);
                                this.$emit('done');
                            }
                        }
                    });
                });

                this.files = [];
                this.$refs.files.value = '';
            }
        },
    };
</script>

<style scoped>
    .dropzone {
        cursor: pointer;
        border: 2px dashed rgb(123, 123, 123, 0.5);
        border-radius: 5px;
        background: white;
        min-height: 150px;
        padding: 54px 54px;
        box-sizing: border-box;
    }

    .hiddenfile {
        width: 0px;
        height: 0px;
        overflow: hidden;
    }

    .dragover {
        border: 2px dashed rgb(11, 68, 255);
    }
</style>
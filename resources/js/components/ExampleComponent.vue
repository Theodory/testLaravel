<template>
    <div class="app">
        <h3>CKeditor</h3>
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>

    import CKEditor from '@ckeditor/ckeditor5-vue';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';



    Vue.use( CKEditor );

  
   export default {
        name: 'app',
        data() {
            return {
                editor: ClassicEditor,
                editorData: '<p><span>&bull;</span> </p>',
                editorConfig: {
                    'bulletedList': true,

                    toolbar: {
                        items: [
                            'bold',
                            'italic',
                            'bulletedList'
                        ]
                    }
                }

            };
        },

    };


</script>

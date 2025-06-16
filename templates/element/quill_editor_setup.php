<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block'],
                    [{ list: 'ordered'}, { list: 'bullet' }],
                    ['clean']
                ]
            }
        });

        // Set initial value
        const hiddenField = document.querySelector('#text');
        quill.root.innerHTML = hiddenField.value;

        // Update hidden field on submit
        const form = document.getElementById('post-form');
        form.addEventListener('submit', function () {
            hiddenField.value = quill.root.innerHTML;
        });
    });
</script>

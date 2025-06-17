<?php
/**
 * @var string $editorId – the DOM id of the editor (e.g. 'editor')
 * @var string $fieldName – the name of the hidden input field (e.g. 'text')
 * @var string|null $initialContent – optional HTML to preload into the editor
 */
$editorId = $editorId ?? 'editor';
$fieldName = $fieldName ?? 'text';
$initialContent = $initialContent ?? '';
$toolbarId = $editorId . '-toolbar';
?>
<!-- Toolbar -->
<div id="<?= $toolbarId ?>">
  <span class="ql-formats">
    <select class="ql-font"></select>
    <select class="ql-size"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-bold"></button>
    <button class="ql-italic"></button>
    <button class="ql-underline"></button>
    <button class="ql-strike"></button>
  </span>
    <span class="ql-formats">
    <select class="ql-color"></select>
    <select class="ql-background"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-script" value="sub"></button>
    <button class="ql-script" value="super"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-header" value="1"></button>
    <button class="ql-header" value="2"></button>
    <button class="ql-blockquote"></button>
    <button class="ql-code-block"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-list" value="ordered"></button>
    <button class="ql-list" value="bullet"></button>
    <button class="ql-indent" value="-1"></button>
    <button class="ql-indent" value="+1"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-direction" value="rtl"></button>
    <select class="ql-align"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-link"></button>
    <button class="ql-image"></button>
    <button class="ql-video"></button>
    <button class="ql-formula"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-clean"></button>
  </span>
</div>

<!-- Editor -->
<div id="<?= $editorId ?>" style="height: 300px;"></div>
<input type="hidden" id="<?= $fieldName ?>" name="<?= $fieldName ?>" value="<?= h($initialContent) ?>" />

<!-- Init script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#<?= $editorId ?>', {
            theme: 'snow',
            placeholder: 'Compose your post...',
            modules: {
                syntax: true,
                formula: true,
                toolbar: {
                    container: '#<?= $toolbarId ?>',
                    handlers: {
                        image: function () {
                            const input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');
                            input.click();

                            input.onchange = async () => {
                                const file = input.files[0];
                                if (file) {
                                    const formData = new FormData();
                                    formData.append('image', file);

                                    try {
                                        const csrfToken = document.querySelector('meta[name="csrfToken"]').getAttribute('content');
                                        const res = await fetch('<?= $this->Url->build(["controller" => "Posts", "action" => "uploadImage"]) ?>', {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-Token': csrfToken
                                            },
                                            body: formData,
                                        });

                                        const data = await res.json();
                                        if (data.url) {
                                            const range = quill.getSelection(true);
                                            quill.insertEmbed(range.index, 'image', data.url);
                                        } else {
                                            alert('Upload failed');
                                        }
                                    } catch (e) {
                                        alert('Upload error');
                                        console.error(e);
                                    }
                                }
                            };
                        }
                    }
                }
            }
        });

        const hiddenInput = document.getElementById('<?= $fieldName ?>');
        if (hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
        }

        const form = hiddenInput.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                hiddenInput.value = quill.root.innerHTML;
            });
        }
    });
</script>


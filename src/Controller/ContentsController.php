<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 */
class ContentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contents->find();
        $contents = $this->paginate($query);

        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('contents'));
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, contain: []);

        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('content'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Prevent file objects being injected into content accidentally
            unset($data['new_image'], $data['new_file']);

            // Patch entity with submitted data (excluding file uploads)
            $content = $this->Contents->patchEntity($content, $data, [
                'accessibleFields' => ['slug' => false, 'title' => false]
            ]);

            // Handle image replacement
            if ($content->type === 'image') {
                $uploadedImage = $this->request->getData('new_image');

                if (
                    $uploadedImage instanceof \Laminas\Diactoros\UploadedFile &&
                    $uploadedImage->getError() === UPLOAD_ERR_OK
                ) {
                    $uploadPath = WWW_ROOT . 'images' . DS;
                    $targetFilename = $content->content;

                    // Make sure directory exists
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }

                    $uploadedImage->moveTo($uploadPath . $targetFilename);
                }
            }

            // Handle file replacement (e.g., resume)
            if ($content->type === 'file') {
                $uploadedFile = $this->request->getData('new_file');

                if (
                    $uploadedFile instanceof \Laminas\Diactoros\UploadedFile &&
                    $uploadedFile->getError() === UPLOAD_ERR_OK
                ) {
                    $uploadPath = WWW_ROOT . 'documents' . DS;
                    $targetFilename = $content->content;

                    // Make sure directory exists
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }

                    $uploadedFile->moveTo($uploadPath . $targetFilename);
                }
            }

            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }

        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('content'));
    }

}

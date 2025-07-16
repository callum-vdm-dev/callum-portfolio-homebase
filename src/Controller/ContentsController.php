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
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Contents->newEmptyEntity();
        if ($this->request->is('post')) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }

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

            // Prevent file object being injected into content accidentally
            unset($data['new_image']);

            // Patch content entity with form data (excluding the file)
            $content = $this->Contents->patchEntity($content, $data);

            // Handle image upload after patching
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

                    // Overwrite existing image file
                    $uploadedImage->moveTo($uploadPath . $targetFilename);
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


    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

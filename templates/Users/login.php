<section class="main style1 special">
    <div class="container">
        <?= $this->Flash->render() ?>

        <header class="major">
            <h2>Login</h2>
            <p>Please enter your email and password to continue</p>
        </header>

        <div class="row justify-content-center">
            <div class="col-6 col-12-medium">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]) ?>
                <div class="fields">
                    <div class="field half">
                        <?= $this->Form->control('email', [
                            'required' => true,
                            'label' => 'Email',
                            'class' => 'input'
                        ]) ?>
                    </div>
                    <div class="field half">
                        <?= $this->Form->control('password', [
                            'required' => true,
                            'label' => 'Password',
                            'class' => 'input'
                        ]) ?>
                    </div>
                </div>
                <ul class="actions special pt-2">
                    <li><?= $this->Form->submit(__('Login'), ['class' => 'button primary']) ?></li>
                </ul>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

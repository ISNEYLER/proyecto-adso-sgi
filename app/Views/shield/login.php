<?= $this->extend('templates/layout-two'); ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-center mb-8 text-gray-800">
            <?= lang('Auth.login') ?>
        </h1>

        <!-- ERRORES -->
        <?php if (session('error') !== null) : ?>
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                <?= esc(session('error')) ?>
            </div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?= esc($error) ?><br>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= esc(session('errors')) ?>
                <?php endif ?>
            </div>
        <?php endif ?>

        <!-- MENSAJE -->
        <?php if (session('message') !== null) : ?>
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                <?= esc(session('message')) ?>
            </div>
        <?php endif ?>

        <form action="<?= url_to('login') ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    <?= lang('Auth.email') ?>
                </label>
                <input
                    type="email"
                    name="email"
                    value="<?= old('email') ?>"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    <?= lang('Auth.password') ?>
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>
            
            <!-- BOTÓN -->
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200"
            >
                <?= lang('Auth.login') ?>
            </button>
        </form>

    </div>

</div>

<?= $this->endSection() ?>

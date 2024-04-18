<!--Scrapper form-->
<?php require_once './app/Utils/link.php' ?>

<div x-data="data" class="row mb-3">

    <div class="col">

        <form id="parser-form" @submit.prevent="parseRequest()" class="mb-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Введите URL адрес сайта</label>
                <input
                    x-ref="urlField"
                    :value="url"
                    x-model="url"
                    name="url"
                    type="url"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="https://example.com"
                >
            </div>

            <button x-text="status" type="submit" class="btn btn-primary"></button>
        </form>

    </div>


</div>

<div class="row">

    <div class="col">

        <form method="post" action="index.php?page=home&action=destroy">

            <button type="submit" class="btn btn-danger">Очистить</button>
        </form>

    </div>


</div>

<?php if (!file_exists('./parsed/link.txt')): ?>

<?php else: ?>
    <p class="mt-5">
        <a download href="<?= json_link('./parsed/link.txt') ?>">Скачать файл</a>
    </p>

<?php endif; ?>


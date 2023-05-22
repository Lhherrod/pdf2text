<div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
    <a href="/pdf-parser">Access PDF Parser<span aria-hidden="true">&rarr;</span></a>
    <a href="/spreadsheet-parser/create">Access Number Cruncher<span aria-hidden="true">&rarr;</span></a>
    <a href="/spreadsheet-files">View all Spreadsheet files<span aria-hidden="true">&rarr;</span></a>

    <!-- <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>
    <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a> -->
</div>
<div class="text-base font-semibold leading-7 text-white mt-6">
    <?php if ($_SESSION['user'] ?? false) : ?>
        <p>Hello, <?= $_SESSION['user']['name'] . '...' ?>
        <form action="/session" method="post">
            <input type="hidden" value="DELETE" name="_method">
            <button type="submit" class="text-green-500">Log Out?...</button>
        </form>
        </p>
    <?php else : ?>
        <p> Hello, Guest...
            <a class="text-green-500" href="/register">Register?...</a>
            or
            <a class="text-green-500" href="/login">Login?...</a>
        </p>
    <?php endif; ?>
</div>
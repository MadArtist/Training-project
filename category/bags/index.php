<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Category-1</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

    <?php include_once 'header.html' ?>

    <section class="product-page">
        <header class="cat_description">
            <hr>
            <h2>Category name</h2>
            <p>Description</p>
            <hr>
        </header>
        <form class="sorting">
            <div class="per_page">
                <label for="items_per_page">Show N per page</label>
                <select name="per_page" id="items_per_page">
                    <option value="3">3</option>
                    <option value="6" selected="selected">6</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="sort">
                <label for="sort">Sort by</label>
                <select name="sort" id="sort">
                    <option value="name_asc" selected="selected">Name: A-Z</option>
                    <option value="name_desc">Name: Z-A</option>
                    <option value="price_asc">Price: ascending</option>
                    <option value="price_desc">Price: descending</option>
                </select>
            </div>
            <input type="button" value="Apply">
        </form>
        <div class="products">
            <div class="item">

                <a href="#"><img src="/img/bag-1.png" class="item-img"></a>

                <br>
                <a href="#">Item name</a>
                <p class="prod_description">Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book.</p>
                <div class="price">
                    <b>$45.20</b>
                    <a href="#"><img src="/img/shopping-cart.png"></a>
                </div>
            </div>
        </div>
        <footer class="nav">

        </footer>
    </section>

    <?php include_once 'footer.html' ?>

</body>
</html>
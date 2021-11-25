<div class="card">
    <div class="card-header bg-white">
        <b>Category</b>
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach ($category as $category) : ?>
            <li class="list-group-item"><a class="text-decoration-none text-muted" href="<?php echo base_url('category/item/' . $category->category_slug); ?>"> <i class="bi-tag"></i> <?php echo $category->category_name; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="card mt-3">
    <div class="card-header bg-white">
        <b>Berita Populer</b>
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach ($berita_popular as $berita_popular) : ?>
            <li class="list-group-item"><a class="text-decoration-none text-muted sidebar" href="<?php echo base_url('berita/detail/' . $berita_popular->berita_slug); ?>">

                    <b>
                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                            <?php echo $berita_popular->berita_title_en; ?>
                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                            <?php echo $berita_popular->berita_title_id; ?>
                        <?php else : ?>
                            <?php echo $berita_popular->berita_title_id; ?>
                        <?php endif; ?>
                    </b><br><br>

                </a></li>
        <?php endforeach; ?>
    </ul>
</div>
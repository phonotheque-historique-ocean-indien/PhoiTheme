<nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
  <div class="container">
    <ul class="ariane">
      <li><a href="/"><?php _p("Accueil"); ?></a></li>
      <li class="is-active"><a href="#" aria-current="page"><?php _p("Playlists"); ?></a></li>
    </ul>
  </div>
</nav>

<h1 class="page-title"><?php _p("Playlists"); ?></h1>
<div class="display-options level is-flex-desktop">
  <div class="level-left">
    <button class="button action-btn add-new is-uppercase has-text-centered">
      <span class="icon">
        <i class="mdi mdi-plus"></i>
      </span>
      &nbsp <?php _p("Nouveau"); ?>
    </button>
  </div>
  <div class="level-right">
    <p class="level-item"><?php _p("trier par"); ?> &nbsp
      <em class="has-text-weight-semibold"><?php _p("le plus récent"); ?></em>
      <span class="icon red">
        <i class="fa fa-caret-down"></i>
      </span>
    </p>
    <div class="dropdown is-hoverable">
      <div class="dropdown-trigger">
        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
          <span>
            <p class="level-item"><?php _p("présentation par"); ?> &nbsp
              <em class="has-text-weight-semibold"><?php _p("vignettes"); ?></em>
          </span>
          <span class="icon red">
            <i class="fa fa-caret-down"></i>
          </span>
        </button>
      </div>
      <div class="dropdown-menu" id="dropdown-menu" role="menu">
        <div class="dropdown-content">
          <a href="./Playlists_list" class="dropdown-item">
            <?php _p("liste"); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="columns">
  <div class="column is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/alain-peters-1600.png" alt="Alain Peters image">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 1</h2>
          <h3 class="card-subtitle">sous-titre</h3>
          <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit amodio nerutis aliquam.</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/segas_mauriciens.jpg" alt="image card-titlee">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 2</h2>
          <h3 class="card-subtitle">du gro pilé au moderne.</h3>
          <p>A la fois musique et danse, le séga, ipsum dolor sit amet consectetuer adipiscing elit l’océan Indien.</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
  </div>
  <div class="column is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/Dj-Sebb.png" alt="Dj Sebb image">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 3</h2>
          <h3 class="card-subtitle">sous-titre</h3>
          <p>Depuis "L’intéressant" de PLL et "Ral Sah" de Black T dont les clips, mis en ligne l’été dernier, ont dépassé les...</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/Webp.png" alt="Webp image">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 4</h2>
          <h3 class="card-subtitle">sous-titre</h3>
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur commodo ...</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
  </div>
  <div class="column is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/siti-contact-bg.png" alt="Siti & The Band image">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 5</h2>
          <h3 class="card-subtitle">sous-titre</h3>
          <p>Vecteur de l’émancipation des femmes à Zanzibar, le taarab est lorem iipsum dolor sit amet, consectetur adipiscing elit. In ultrices augue...</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="../../themes/phoi/assets/pawtucket/graphics/Abdullah-Ibrahim-©-DR-PAM.png" alt="Abdullah-Ibrahim-©-DR-PAM image">
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <div class="card-details">
            <p class="date pull-right"><?php _p("genre"); ?></p>
          </div>
          <h2 class="card-title">Playlist 6</h2>
          <h3 class="card-subtitle">sous-titre</h3>
          <p>Si certains accords durant toute sa ipsum dolor sit amet, consectetur adipiscing elit ...</p>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item"><?php _p("En savoir plus"); ?></a>
      </footer>
    </div>
  </div>
</div>
<div class="level">
  <div class="level-item has-text-centered">
    <button class="button action-btn more is-medium has-text-weight-bold"><?php _p("Charger plus de playlists"); ?></button>
  </div>
</div>

<style>
  .breadcrumb {
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    background-color: #D5D9B9;
    padding: 1rem;
    line-height: 19px;
    color: #232425 !important;
    width: 100vw;
  }

  .breadcrumb a {
    color: #232425 !important;
  }

  .breadcrumb li+li::before {
    color: #232425 !important;
  }

  .ariane {
    padding-left: 0.5rem;
  }

  .page-title {
    margin-top: 50px;
    margin-bottom: 32px;
    font-size: 2.25rem !important;
    font-weight: 200 !important;
    line-height: 42px;
    padding-left: 0.6rem;
  }

  .level-item em {
    color: #E4675F;
    font-style: normal !important;
  }

  .display-options {
    padding-left: 0.6rem;
    justify-content: space-between;
    margin-bottom: 1rem !important;
  }

  .level-item .red {
    color: #E4675F !important;
  }

  .add-new {
    font-size: 0.8rem;
    line-height: 0.9rem;
  }

  .dropdown-content {
    box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.24), 0px 0px 8px rgba(0, 0, 0, 0.12);
    background: #FAFAFA;
  }

  hr {
    margin: 0 0.6rem 3.125rem 0.6rem !important;
  }

  .author {
    text-transform: uppercase;
    color: #7DAFCA;
    font-size: 0.75rem;
    line-height: 150%;
  }

  .date {
    color: #8D9DA0;
    font-size: 0.75rem;
  }

  .card {
    margin: 0.5rem 0.5em 3rem 0.5rem;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
  }

  .card-details {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 0.5rem !important;
  }

  .card-title {
    font-size: 1.18rem !important;
    margin: 0 !important;
    padding-top: 0 !important;
  }

  .card-subtitle {
    font-size: 1.18rem !important;
    margin-top: 0 !important;
    font-weight: 300 !important;
  }

  .card-footer-item {
    color: #E4675F;
    text-decoration: underline;
    justify-content: flex-start !important;
    padding-left: 1.5rem;
  }

  .display-options .button {
    border-color: #FFFFFF;
  }

  .more {
    padding-left: 3rem;
    padding-right: 3rem;
  }

  .action-btn {
    background-color: #E4675F !important;
    color: #FFFFFF !important;
    border-radius: 2px;
    text-align: center;
  }

  .action-btn:hover,
  .action-btn.is-hovered {
    background-color: #FFFFFF !important;
    color: #E4675F !important;
    border: 2px solid #E4675F;
    box-sizing: border-box;
    border-radius: 2px;
  }

  @media screen and (max-width: 768px) {
    .display-options {
      flex-direction: column;
      margin-top: 0 !important;
    }

    .level-right button {
      padding: 0 !important;
    }

    .level-item {
      justify-content: flex-start;
    }
  }
</style>
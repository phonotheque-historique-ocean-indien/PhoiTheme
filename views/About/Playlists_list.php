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
    <div class="dropdown is-hoverable">
      <div class="dropdown-trigger">
        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
          <span>
            <p class="level-item"><?php _p("présentation par"); ?> &nbsp
              <em class="has-text-weight-semibold"><?php _p("liste"); ?></em>
          </span>
          <span class="icon red">
            <i class="fa fa-caret-down"></i>
          </span>
        </button>
      </div>
      <div class="dropdown-menu" id="dropdown-menu" role="menu">
        <div class="dropdown-content">
          <a href="./Playlists" class="dropdown-item">
            <?php _p("vignettes"); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="columns">
  <div class="column">
    <table class="table is-striped is-fullwidth">
      <thead>
        <tr>
          <th>
            <abbr title="Title">
              <?php _p("Titre"); ?>
              <span class="icon red">
                <i class="fa fa-caret-down"></i>
              </span>
            </abbr></th>
          <th>
            <abbr title="Date"><?php _p("Date"); ?>
            <span class="icon red">
                <i class="fa fa-caret-down"></i>
              </span>
            </abbr>
          </th>
          <th>
            <abbr title="Author">
              <?php _p("Auteur"); ?>
            <span class="icon red">
              <i class="fa fa-caret-down"></i>
            </span>
            </abbr>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nom de Playlist 1</td>
          <td>30.03.2019</td>
          <td>Jacques Grondin</td>
        </tr>
        <tr>
          <td>Nom de Playlist 2</td>
          <td>30.03.2019</td>
          <td>Richard Ratsimandravavalomana...</td>
        </tr>
        <tr>
          <td>Nom de Playlist 3</td>
          <td>30.03.2019</td>
          <td>Donald Trump</td>
        </tr>
        <tr>
          <td>Nom de Playlist 4</td>
          <td>30.03.2019</td>
          <td>Mireille Mathieu</td>
        </tr>
        <tr>
          <td>Lorem Ipsum Dolor Sit Amet 5</td>
          <td>30.03.2019</td>
          <td>Julien Doré</td>
        </tr>
        <tr>
          <td>Lorem ipsum dolor 6</td>
          <td>30.03.2019</td>
          <td>Kenny Rogers</td>
        </tr>
        <tr>
          <td>Lorem ipsum dolor 7</td>
          <td>30.03.2019</td>
          <td>Richard Ratsimandravavalomana...</td>
        </tr>
        <tr>
          <td>Nom de Playlist 8</td>
          <td>30.03.2019</td>
          <td>Donald Trump</td>
        </tr>
        <tr>
          <td>Nom de Playlist 9</td>
          <td>30.03.2019</td>
          <td>Jacques Grondin</td>
        </tr>
        <tr>
          <td>Nom de Playlist A</td>
          <td>30.03.2019</td>
          <td>Mireille Mathieu</td>
        </tr>
        <tr>
          <td>Nom de Playlist B</td>
          <td>30.03.2019</td>
          <td>Jacques Grondin</td>
        </tr>
        <tr>
          <td>Nom de Playlist C</td>
          <td>30.03.2019</td>
          <td>Julien Doré</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<nav class="pagination is-right is-small" role="navigation" aria-label="pagination">
  <div class="dropdown is-hoverable">
    <div class="dropdown-trigger">
      <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
        <span>
          <p class="level-item"><?php _p("résultats par page"); ?> &nbsp
            <em class="has-text-weight-semibold">12</em>
        </span>
        <span class="icon red">
          <i class="fa fa-caret-down"></i>
        </span>
      </button>
    </div>
    <div class="dropdown-menu" id="dropdown-menu" role="menu">
      <div class="dropdown-content">
        <a href="#" class="dropdown-item">
          24
        </a>
        <a href="#" class="dropdown-item">
          48
        </a>
        <a href="#" class="dropdown-item">
          100
        </a>
      </div>
    </div>
  </div>

  <ul class="pagination-list">
    <li><a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a></li>
    <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
    <li><a class="pagination-link" aria-label="Goto page 3">3</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link" aria-label="Goto page 232">232</a></li>
  </ul>
</nav>

<style>
  .ariane {
    padding-left: 0.5rem;
  }

  .breadcrumb {
    background-color: #D5D9B9;
    padding: 1rem;
    line-height: 19px;
    color: #232425 !important;
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
  }

  .breadcrumb a {
    color: #232425 !important;
  }

  .breadcrumb li+li::before {
    color: #232425 !important;
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

  .display-options .button,
  .pagination .button {
    border: none !important;
  }

  .level-item .red {
    color: #E4675F !important;
  }

  .add-new {
    font-size: 0.8rem;
    line-height: 0.9rem;
    border-radius: 2px;
  }

  hr {
    margin: 0 0.6rem 3.125rem 0.6rem !important;
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

  .more {
    padding-left: 3rem;
    padding-right: 3rem;
  }

  .table {
    font-size: 0.8rem;
    padding: 1.5rem 0.5rem;
  }

  .table th abbr {
    color: #8D9DA0 !important;
    font-size: 1rem;
    text-decoration: none;
  }

  .table td,
  .table th {
    padding: 1rem 0.75rem !important;
  }

  .table abbr {
    color: #8D9DA0;
  }

  .pagination .level-item,
  .pagination .dropdown-item {
    font-size: 0.75rem;
    text-align: center;
  }

  .pagination-link {
    border: none;
    color: #232425;
  }

  .pagination-link.is-current {
    background-color: #E4675F;
    border: none;
    color: #fff;
  }

  .pagination-link:hover {
    cursor: pointer;
    background-color: #EFEFEF;
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
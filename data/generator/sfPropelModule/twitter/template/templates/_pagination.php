
    [?php if ($pager->getNbResults()): ?]

    <div class="container-fluid">
      <div class="table-result pull-left">
        [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
        [?php if ($pager->haveToPaginate()): ?]
          [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
          <span class="help-pagination">
            [?php
              $nb = $pager->getMaxPerPage();
              if ($pager->getPage() == $pager->getLastPage()) {
                // we calculate the modulo between the total result and the max_per_page to get the rest of the results
                $nb = $pager->getNbResults() % $pager->getMaxPerPage();
              }
              echo format_number_choice(__('[0] no item on this page|[1] 1 item on this page|(1,+Inf] %1% items on this page'), array('%1%' => $nb), $nb, 'sf_admin')
            ?]
          </span>
        [?php endif; ?]
      </div>

      [?php if ($pager->haveToPaginate()): ?]

        <div class="pagination pull-right btn-group" role="group">
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1" title="[?php echo __('First page', array(), 'sf_admin') ?]"
               class="btn btn-default [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
                <span class="fa fa-fast-backward"></span>
            </a>
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]"
               title="[?php echo __('Previous page', array(), 'sf_admin') ?]"
               class="btn btn-default [?php if (1 == $pager->getPage()): ?]disabled[?php endif; ?]">
                <span class="fa fa-step-backward"></span>
            </a>

            [?php foreach ($pager->getLinks() as $page): ?]
            [?php if ($page == $pager->getPage()): ?]
            <div class="btn btn-default active">
                <a href="#">[?php echo $page ?]</a>
            </div>
            [?php else: ?]
                <a class="btn btn-default" href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
            [?php endif; ?]
            [?php endforeach; ?]

            <a class="btn btn-default [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]"
               title="[?php echo __('Next page', array(), 'sf_admin') ?]"
               href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
                <span class="fa fa-step-forward"></span>
            </a>
            <a class="btn btn-default [?php if ($pager->getLastPage() == $pager->getPage()): ?]disabled[?php endif; ?]"
               title="[?php echo __('Last page', array(), 'sf_admin') ?]"
               href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
                <span class="fa fa-fast-forward"></span>
            </a>

        </div>

      [?php endif; ?]

    </div>

    [?php endif; ?]

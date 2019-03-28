<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        $this->Paginator->templates([
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);
        $this->Paginator->templates([
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);
        $this->Paginator->templates([
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);
        $this->Paginator->templates([
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);
        $this->Paginator->templates([
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);
        ?>
        <?= $this->Paginator->prev(__('Anterior')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Siguiente')) ?>
    </ul>
</nav> 
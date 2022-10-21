@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Post List')

@section('vendor-style')
    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/sortable-list-tree/css/treeSortable.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/sortable-list-tree/style.css')) }}">
@endsection

@section('page-style')

@endsection

@section('content')
    <section class="list-wrapper">
        <div class="container">
            <div class="wrapper">
                <ul id="left-tree"></ul>
                <ul id="right-tree"></ul>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <script src="{{ asset('vendors/js/sortable-list-tree/js/treeSortable.js') }}"></script>
    <script>
        $(document).ready(function () {
            const dataLeft = [
                {
                    id: 1,
                    parent_id: 0,
                    title: 'Branch 1',
                    level: 1,
                },
                {
                    id: 2,
                    parent_id: 1,
                    title: 'Branch 1',
                    level: 2,
                },
                {
                    id: 3,
                    parent_id: 1,
                    title: 'Branch 3',
                    level: 2,
                },
                {
                    id: 4,
                    parent_id: 3,
                    title: 'Branch 4',
                    level: 3,
                },
                {
                    id: 5,
                    parent_id: 3,
                    title: 'Branch 5',
                    level: 3,
                },
                {
                    id: 6,
                    parent_id: 1,
                    title: 'Branch 6',
                    level: 2,
                },
                {
                    id: 7,
                    parent_id: 0,
                    title: 'Branch 7',
                    level: 1,
                },
                {
                    id: 8,
                    parent_id: 1,
                    title: 'Branch 8',
                    level: 2,
                },
                {
                    id: 9,
                    parent_id: 1,
                    title: 'Branch 9',
                    level: 2,
                },
                {
                    id: 10,
                    parent_id: 9,
                    title: 'Branch 10',
                    level: 3,
                },
            ];

            const dataRight = [
                {
                    id: 1,
                    parent_id: 0,
                    title: 'Item 1',
                    level: 1,
                },
                {
                    id: 2,
                    parent_id: 1,
                    title: 'Item 4',
                    level: 2,
                },
                {
                    id: 3,
                    parent_id: 0,
                    title: 'Item 2',
                    level: 1,
                },
                {
                    id: 4,
                    parent_id: 3,
                    title: 'Item 3',
                    level: 2,
                },
            ];

            const leftTreeId = '#left-tree';
            const leftSortable = new TreeSortable({
                treeSelector: leftTreeId,
            });
            const $leftTree = $(leftTreeId);
            const $content = dataLeft.map(leftSortable.createBranch);
            $leftTree.html($content);
            leftSortable.run();

            const delay = () => {
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve();
                    }, 1000);
                });
            };

            leftSortable.onSortCompleted(async (event, ui) => {
                await delay();
                console.log('left tree', ui.item);
            });

            leftSortable.addListener('click', '.add-child', function (event, instance) {
                event.preventDefault();
                instance.addChildBranch($(event.target));
            });

            leftSortable.addListener('click', '.add-sibling', function (event, instance) {
                event.preventDefault();
                instance.addSiblingBranch($(event.target));
            });

            leftSortable.addListener('click', '.remove-branch', function (event, instance) {
                event.preventDefault();

                const confirm = window.confirm('Are you sure you want to delete this branch?');
                if (!confirm) {
                    return;
                }
                instance.removeBranch($(event.target));
            });

            const rightTreeId = '#right-tree';
            const rightSortable = new TreeSortable({
                treeSelector: rightTreeId,
            });
            const $rightTree = $(rightTreeId);
            const $rightContent = dataRight.map(rightSortable.createBranch);
            $rightTree.html($rightContent);
            rightSortable.run();
            rightSortable.onSortCompleted(async (event, ui) => {
                await delay();
                console.log('right tree', ui.item);
            });

            rightSortable.addListener('click', '.add-child', function (event, instance) {
                instance.addChildBranch($(event.target));
            });
            rightSortable.addListener('click', '.add-sibling', function (event, instance) {
                instance.addSiblingBranch($(event.target));
            });

            tippy('[data-tippy-content]');
        });

    </script>
@endsection

@section('page-script')

@endsection

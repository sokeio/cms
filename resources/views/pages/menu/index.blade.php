<div class="table-page">
    <div class="page-header d-print-none">
        <div class="container-fluid">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <h2 class="page-title ps-2">
                        {!! $page_title ?? '' !!}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none ps-4">
                    <select class="form-select" wire:model.live='locationId'>
                        <option value="0"> Add New</option>
                        @foreach ($MenuLocation as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-fluid">
            <livewire:cms::pages.menu.edit :$locationId wire:key='menu-{{ $locationId }}' />
        </div>
    </div>
</div>

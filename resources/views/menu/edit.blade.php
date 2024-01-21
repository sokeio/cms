<div class="row">
    <div class="{{ column_size('col4') }}">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordion-example" wire:ignore>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-1" aria-expanded="true">
                                Pages
                            </button>
                        </h2>
                        <div id="collapse-1" class="accordion-collapse collapse show"
                            data-bs-parent="#accordion-example" style="">
                            <div class="accordion-body pt-0">
                                <strong>This is the first item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-2" aria-expanded="false">
                                Posts
                            </button>
                        </h2>
                        <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                            <div class="accordion-body pt-0">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and hiding
                                via CSS transitions. You can modify any of this with custom CSS or overriding our
                                default variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-3" aria-expanded="false">
                                Custom Links
                            </button>
                        </h2>
                        <div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                            <div class="accordion-body pt-0" x-data="{
                                custom_url: '',
                                custom_name: '',
                                custom_class: '',
                                resetData() {
                                    this.custom_url = '';
                                    this.custom_name = '';
                                    this.custom_class = '';
                                }
                            }">
                                <div class="mb-3">
                                    <label class="form-label">Url</label>
                                    <input x-model='custom_url' type="text" class="form-control" placeholder="Url">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input x-model='custom_name' type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Class</label>
                                    <input x-model='custom_class' type="text" class="form-control"
                                        placeholder="class">
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto"
                                        @click="$wire.doAddMenu({link:custom_url,name:custom_name,class:custom_class});resetData();">Add
                                        To Menu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-4" aria-expanded="false">
                                Categories
                            </button>
                        </h2>
                        <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                            <div class="accordion-body pt-0">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="{{ column_size('col8') }}">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title ">
                    <div class="row">
                        <div class="col-auto col-form-label">Menu Name:</div>
                        <div class="col"><input wire:model='menu_name' class=" form-control"
                                placeholder="Menu Name" /></div>
                    </div>
                </h3>
                <div class="card-actions">
                    <a wire:click='doSave()' class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Save
                    </a>
                </div>
            </div>
            <div class="sortable-fallback"></div>
            <div class="card-body p-0 position-md-relative">
                <div wire:sortable-group='doUpdateSortMenu'
                    wire:sortable-group.options='{
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        filter: ".ellock",
                        preventOnFilter: false,
                }'
                    wire:sortable-group.item-group="0" class="menu-editor-manager">
                    @includeIf('cms::menu.menu-item', [
                        'menu_lists' => $menu_lists,
                        'parent_id' => 0,
                        'level' => 0,
                    ])
                </div>

            </div>
            <div class="card-footer">
                <label class="form-label">Locations</label>
                <div class="">
                    @foreach ($locations as $item)
                        <label class="form-check">
                            <input wire:model='menu_locations' class="form-check-input" value="{{ $item }}"
                                type="checkbox" />
                            <span class="form-check-label">{{ $item }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

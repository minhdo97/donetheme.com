{{--<!-- Add Role Modal -->--}}
{{--<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header bg-transparent">--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body px-5 pb-5">--}}
{{--                <div class="text-center mb-4">--}}
{{--                    <h1 class="role-title">Edit Role</h1>--}}
{{--                    <p>Set role permissions</p>--}}
{{--                </div>--}}
{{--                <!-- Add role form -->--}}
<form id="editRoleForm" class="row" action="{{route('api.admin.roles.update',['role'=>$role->id])}}"
      method="POST" onsubmit="return false">  @csrf @method('PUT')
    <div class="col-12">
        <label class="form-label" for="modalRoleName">Role Name</label>
        <input
            type="text"
            id="modalRoleName"
            name="modalRoleName"
            class="form-control"
            placeholder="Enter role name"
            tabindex="-1"
            value="{{old('modalRoleName',$role->name)}}"
            data-msg="Please enter role name"
        />
    </div>
    <div class="col-12">
        <h4 class="mt-2 pt-50">Role Permissions</h4>
        <!-- Permission table -->
        <div class="table-responsive">
            <table class="table table-flush-spacing">
                <tbody>
                <tr>
                    <td class="text-nowrap fw-bolder">
                        Administrator Access
                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                              title="Allows a full access to the system">
                        <i data-feather="info"></i>
                      </span>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll2"/>
                            <label class="form-check-label" for="selectAll"> Select All </label>
                        </div>
                    </td>
                </tr>
                @foreach($permissions->groupBy('group') as $key=>$permission)
                    <tr>
                        <td class="text-nowrap fw-bolder">{{$key}}</td>
                        <td>
                            <div class="d-flex">
                                @foreach($permission as $key1=>$permission1)
                                    <div class="form-check me-3 me-lg-1">
                                        <input class="form-check-input" type="checkbox"
                                               @if($role->hasPermissionTo($permission1->name)) checked
                                               @endif
                                               id="permissions_{{$key1}}" name="permissions[]"
                                               value="{{$permission1->name}}"/>
                                        <label class="form-check-label"
                                               for="permissions_{{$key1}}"> {{\Str::ucfirst($permission1->action)}} </label>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Permission table -->
    </div>
    <div class="col-12 text-center mt-2">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                aria-label="Close">
            Discard
        </button>
    </div>
</form>
{{--                <!--/ Add role form -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--/ Add Role Modal -->
<script>
    $(function () {
        // // Select All checkbox click
        const selectAll = document.querySelector('#selectAll2'),
            checkboxList = document.querySelectorAll('[type="checkbox"]');
        selectAll.addEventListener('change', t => {
            checkboxList.forEach(e => {
                e.checked = t.target.checked;
            });
        });
        $('#editRoleForm').validate({
            rules: {
                modalRoleName: {
                    required: true
                },
                'permissions[]': {
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: 'PUT',
                    data: $(form).serialize(),
                    success: function (response) {

                        toastr['success']('👋 Jelly-o macaroon brownie tart ice cream croissant jelly-o apple pie.', 'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });
                        location.reload()
                    }
                });
            }
        });
    });
</script>

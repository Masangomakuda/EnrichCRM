<x-app-layout>
    <x-active>

        <div >
            <div>
               
                <div class="pull-right my-3">
                    <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('roles.index') }}">
                        Back</a>
                </div>
            </div>
        </div>
        <div >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div>
                    <strong>Role Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @forelse ($rolePermissions as $permission)
                    <label class="label label-success">{{ $permission->name }} |</label>
                    @empty
                    <div>
                        <p class="text-lg font-medium my-2"> No permissions Assinged to this Role</p>
                    </div>
                    @endforelse

                  <div class="flex flex-row">
                    <a href="{{ route('roles.edit',$role) }}" class="my-2 px-2 mt-2 mr-2 text-white  rounded-sm bg-blue-500">Edit</a>
                    <form action="{{ route('roles.destroy',$role) }}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button  class="my-2 px-3 mt-2 mr-2 rounded-sm bg-red-500 text-white">Delete
                      </button>
                      </form>
                  </div>
                
                </div>
            </div>
        </div>
        
    </x-active>
</x-app-layout>
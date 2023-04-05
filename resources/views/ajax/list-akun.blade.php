<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                ID
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                Foto
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Email
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                role
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Dibuat
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody id="target_result">
        @php
            $i = 1;
        @endphp
        @foreach ($get_user as $user)
            <tr id="tabel_user">
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                </td>
                <td>
                    <div>
                        <img class="rounded" style="width: 25px" src="{{ Avatar::create($user->name)->toBase64() }}">
                    </div>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $user->name }}
                    </p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0 text-capitalize">{{ $user->role }}</p>
                </td>
                <td class="text-center">
                    <span
                        class="text-secondary text-xs font-weight-bold">{{ $user->created_at->diffForHumans() }}</span>
                </td>
                <td class="text-center">
                    @if(Str::contains(Auth::user()->role, 'admin'))
                    <a onClick="editAkun({{ $user->id }})" class="cursor-pointer" data-bs-toggle="tooltip"
                        data-bs-original-title="Edit user">
                        <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <span>
                        <i onClick="detailAkun({{ $user->id }})" class="cursor-pointer fas fa-info-circle text-secondary"></i>
                    </span>
                    <span onClick="hapusAkun({{ $user->id }})" class="mx-1">
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                    </span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
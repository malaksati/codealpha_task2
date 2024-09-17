@extends('layout.master')
@section('title')
    Facebook - Profile
@endsection
@section('content')
    <div class="container profile edit-p pb-5" style="margin-top: 65px; background-color: white;">
        <form action="{{ url('profile/edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <div class="header mb-3">
                    <div>
                        <div class="image-cover" id="img-preview">
                            <img src="{{ asset($user->cover) }}" alt="">
                        </div>
                        <input type="file" accept="images/*" name="cover" id="image" onClick="showModal()"
                            style="display:none" />

                        <span class="edit-cover" onClick="showModal()"><i
                                class="text-secondary fa-regular fa-pen-to-square"></i></span>
                    </div>
                    <div>
                        <div class="image-profile" id="img-preview1">
                            <img class="img-p" src="{{ asset($user->image) }}" alt="">
                        </div>
                        <input type="file" accept="images/*" name="image" id="image1" onClick="showModal1()"
                            style="display:none" />

                        <span class="edit-profile" onClick="showModal1()"><i
                                class="text-secondary fa-regular fa-pen-to-square"></i></span>
                    </div>
                </div>
                <div class="name">
                    <h1>{{ $user->full_name }}</h1>
                </div>
                <div class="edit">
                    <button class="btn" type="submit"><i
                            class="mr-2 text-secondary fa-regular fa-pen-to-square"></i>Update</button>
                </div>
            </div>
            <div class="section">
                <h3><strong>Edit Details</strong></h3>
                <table>
                    <tr>
                        <td><i class="mr-2 fa-solid fa-person"></td>
                        <td><select name="gender" id="">
                                <option value="female">female</option>
                                <option value="male">male</option>
                                <option value="other">other</option>
                            </select>
                        </td>
                    <tr>
                        <td><i class="mr-2 fa-regular fa-calendar-days"></i></td>
                        <td><input type="date" name="birthdate"></td>
                    </tr>
                    <tr>
                        <td><i class="mr-2 fa-solid fa-house"></i></td>
                        <td><input type="text" name="address" value="{{ $user->address }}"></td>
                    </tr>

                    <tr>
                        <td><i class="mr-2 fa-solid fa-phone"></i></td>
                        <td><input type="text" name="phone" value="{{ $user->phone }}"></td>
                    </tr>
                    <tr>
                        <td><i class="mr-2 fa-solid fa-envelope"></i></td>
                        <td><input type="email" value="{{ $user->email }}" name="email"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.angular')

@section('content')

<div class="row">
    <div class="col-xs-12">
        [[ message ]] <br />
        [[ error ]]
        [[ countdown ]]
        <form name="searchUser">
        <div class="form-group">
            <input class="form-control" required type="search" placeholder="Username to find" ng-model="username"/>
        </div>

        <div class="form-group">
            <input class="form-control btn-primary" type="submit" value="Search" ng-click="search(username)"/>
        </div>
        </form>
    </div>
</div>

<div class="row" ng-show="user">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">User From Github</div>
            <div class="panel-body">
                <div class="alert alert-success">
                    <div><img ng-src="[[ user.avatar_url ]]"></div>
                    <div>Name : [[ user.name ]]</div>
                    <div>Location : [[ user.location ]]</div>
                    <div>Company : [[ user.company ]]</div>
                    <div>Join on : [[ user.created_at ]]</div>
                    <div>Public Repos : [[ user.public_repos ]]</div>
                </div>
            </div>
        </div>

        <div id="userDetails">
            Order:
            <select ng-model="repoSortOrder">
                <option value="+name">Name</option>
                <option value="-stargazers_count">Star</option>
                <option value="+language">Language</option>
            </select>

            <table class="table table-condensed table-hover table-striped">
                <thead>
                <th>No.</th>
                <th>Name</th>
                <th>Stars</th>
                <th>language</th>
                </thead>
                <tbody>
                <tr ng-repeat="repo in repos | orderBy:repoSortOrder | limitTo:10">
                    <td>[[ $index + 1 ]]</td>
                    <td>[[ repo.name ]]</td>
                    <td>[[ repo.stargazers_count | number ]]</td>
                    <td>[[ repo.language ]]</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="{{ asset('js/script.js') }}"></script>


@stop
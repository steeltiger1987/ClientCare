<?php

function link_to_dashboard()
{
    if (Auth::user()->isAdmin()) {
        return URL::route('admin.dashboard');
    } elseif (Auth::user()->isClient()) {
        return URL::route('client.dashboard');
    }
}

function link_to_tickets()
{
    if (Auth::user()->isAdmin()) {
        return URL::route('admin.tickets');
    } elseif (Auth::user()->isClient()) {
        return URL::route('client.tickets');
    }
}

function link_to_open_tickets()
{
    if (Auth::user()->isAdmin()) {
        return URL::route('admin.tickets.open');
    } elseif (Auth::user()->isClient()) {
        return URL::route('client.tickets.open');
    }
}

function link_to_resolved_tickets()
{
    if (Auth::user()->isAdmin()) {
        return URL::route('admin.tickets.resolved');
    } elseif (Auth::user()->isClient()) {
        return URL::route('client.tickets.resolved');
    }
}
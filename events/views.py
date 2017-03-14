from django.shortcuts import render
from django.views.generic.detail import DetailView
from django.views.generic.list import ListView
from .models import Events

class EventsListView(ListView):
	model = Events
	queryset = Events.objects.all()


	def get_context_data(self, **kwargs):
	    context = super(EventsListView, self).get_context_data(**kwargs)
	    context["events"] = Events.objects.all()

	    return context
	print(queryset)
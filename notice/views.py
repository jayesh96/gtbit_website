from django.shortcuts import render
from django.views.generic.detail import DetailView
from django.views.generic.list import ListView
from .models import NoticeBoard

class NoticeListView(ListView):
	model = NoticeBoard
	queryset = NoticeBoard.objects.all()


	def get_context_data(self, **kwargs):
	    context = super(NoticeListView, self).get_context_data(**kwargs)
	    context["notices"] = NoticeBoard.objects.all()

	    return context

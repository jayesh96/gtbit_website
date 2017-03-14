from django.contrib import admin

# Register your models here.
from .models import Events

class EventsAdmin(admin.ModelAdmin):
	list_display = ['id','title','date','hide','timestamp']


	class Meta:
		model = Events

admin.site.register(Events,EventsAdmin)

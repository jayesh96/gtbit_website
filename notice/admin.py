from django.contrib import admin

# Register your models here.
from .models import NoticeBoard

class NoticeBoardAdmin(admin.ModelAdmin):
	list_display = ['id','title','date','hide','timestamp']


	class Meta:
		model = NoticeBoard

admin.site.register(NoticeBoard,NoticeBoardAdmin)

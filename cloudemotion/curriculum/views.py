from django.template.response import TemplateResponse
from django.views.generic import View
from django.utils import translation
# Create your views here.


class AboutView(View):

    def get(self, request, *args, **kwargs):
        # import ipdb; ipdb.set_trace()
        user_language = kwargs.get("idiom")
        translation.activate(user_language)
        self.request.session[translation.LANGUAGE_SESSION_KEY] = user_language

        return TemplateResponse(
            request, "porto/index.html", {})

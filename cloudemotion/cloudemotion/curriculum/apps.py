from django.apps import AppConfig


class CurriculumConfig(AppConfig):
    name = 'cloudemotion.curriculum'
    verbose_name = "Curriculum"

    def ready(self):
        """Override this to put in:
            Users system checks
            Users signal registration
        """
        pass

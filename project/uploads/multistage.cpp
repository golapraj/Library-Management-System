#include<stdio.h>
int main()
{
    int max=30;
	int edge[max][max],cost[max][max],vertex_no[max][max],no_ver_set[max];
	int no_sets,no=0,n,i,j,p,k,min,temp=0;
	for(i=1;i<=max;i++)
	{
		for(j=1;j<=max;j++)
		{
			vertex_no[i][j]=-1;
			cost[i][j]=-1;
			edge[i][j]=-1;
		}
	}
	vertex_no[1][1]=1;
	printf("Enter total no of sets::");
	scanf("%d",&no_sets);
	n=2;k=1,no_ver_set[1]=1;
	for(i=2;i<=no_sets;i++)
	{
		printf("\n\nEnter no of vertices in %d set",i);
		scanf("%d",&no_ver_set[i]);
		printf("\nno of vertices in %d set is %d",i,no_ver_set[i]);
		for(j=1;j<=no_ver_set[i];j++)
		{
			vertex_no[i][j]=n;
			n+=1;
			for(k=1;k<=no_ver_set[i-1];k++)
			{
				printf("\nEnter the weight between node %d and node %d ::",vertex_no[i][j],vertex_no[i-1][k]);
				scanf("%d",&edge[vertex_no[i-1][k]][vertex_no[i][j]]);
				edge[vertex_no[i][j]][vertex_no[i-1][k]]=edge[vertex_no[i-1][k]][vertex_no[i][j]];
			}
		}
   }
   for(i=1;i<=max;i++)
   {
		printf("\n");
		for(j=1;j<=max;j++)
		{
			printf("%d ",edge[i][j]);
		}
   }
   cost[no_sets][1]=0;
   for(i=no_sets-1;i>=1;i--)
	{
		printf("\n\ncosts for set %d",i);
		for(j=1;j<=no_ver_set[i];j++)
		{
			min=99;
			for(k=1;k<=no_ver_set[i+1];k++)
			{
				if(edge[vertex_no[i][j]][vertex_no[i+1][k]]!=-1)
				{
					temp=edge[vertex_no[i][j]][vertex_no[i+1][k]]+cost[i+1][k];
					if(temp < min)
						min=temp;
				}
			}
			cost[i][j]=min;
			printf("\nThe cost[%d][%d] is %d",i,vertex_no[i][j],cost[i][j] );
		}
	}
}
